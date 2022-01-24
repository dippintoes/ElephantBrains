const loader=document.getElementById('loader');
const game=document.getElementById('game');
const question = document.getElementById('question');
const choices = Array.from(document.getElementsByClassName('choice-text'));
const progressTxt=document.getElementById('progressTxt');
const scoreTxt = document.getElementById('score');
const progressBarFull = document.getElementById('progressBarFull');

let currentQuestion={};
let acceptingAnswers = false;
let score=0;
let questionCount = 0;
let availableQuestions=[];
let questions=[];

const category = sessionStorage.getItem('category');
fetch(`https://opentdb.com/api.php?amount=10&category=${category}`)
.then((res)=>{
    return res.json();
})
.then((loadedQuestions)=>{
    questions=loadedQuestions.results.map((loadedQuestion)=>{
        const formattedQUestion = {
            question: loadedQuestion.question,
        };

        const answerChoices = [...loadedQuestion.incorrect_answers];
        formattedQUestion.answer=Math.floor(Math.random()*4)+1;

        answerChoices.splice(
            formattedQUestion.answer-1,0,loadedQuestion.correct_answer
        );

        answerChoices.forEach((choice,index)=>{
            formattedQUestion['choice'+(index+1)]=choice;

        });

        return formattedQUestion;

    });

    start();
})
.catch((err)=>{console.error(err);
});

const CORRECT=10;
const MAX_QUESTIONS=10;

start=()=>{
    questionCount=0;
    score=0;
    availableQuestions=[...questions];
    getNewQuestion();
    game.classList.remove('hidden');
    loader.classList.add('hidden');
}

getNewQuestion=()=>{
    if(availableQuestions.length===0||questionCount>=MAX_QUESTIONS){
        localStorage.setItem('LatestScore',score);
        return window.location.assign('end.html');
    }
    questionCount++;
    progressTxt.innerText=`Question ${questionCount}/${MAX_QUESTIONS}`;
    progressBarFull.style.width=`${(questionCount/MAX_QUESTIONS)*100}%`;

    const questionIndex = Math.floor(Math.random()*availableQuestions.length);

    currentQuestion=availableQuestions[questionIndex];

    question.innerHTML=currentQuestion.question;

    choices.forEach((choice)=>{
        const number=choice.dataset['number'];
        choice.innerHTML=currentQuestion['choice'+number];
    });

    availableQuestions.splice(questionIndex,1);

    acceptingAnswers=true;
};

choices.forEach((choice)=>
{
    choice.addEventListener('click',(e)=>{
        if(!acceptingAnswers)
        return;

        acceptingAnswers=false;
        const selectedChoice=e.target;
        const selectedAnswer=selectedChoice.dataset['number'];

        const classToApply=
        selectedAnswer==currentQuestion.answer ? 'correct':'incorrect';

        if(classToApply==='correct'){
            incrementScore(CORRECT);
        }

        selectedChoice.parentElement.classList.add(classToApply);

        setTimeout(()=>{
            selectedChoice.parentElement.classList.remove(classToApply);
            getNewQuestion();
        },1000);
    });

});

incrementScore=(num)=>{
    score+=num;
    scoreTxt.innerText=score;
}