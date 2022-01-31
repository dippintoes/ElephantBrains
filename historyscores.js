const highScoresList = document.getElementById("highScoresList");
const Loggedemail=sessionStorage.getItem('email');
const highScores = JSON.parse(localStorage.getItem("highScores")) || [];

highScoresList.innerHTML = highScores
  .map(score => {
    if(score.email===Loggedemail)
    {
        return `<li class="high-score">${score.score}</li>` 
    }
  })
  .join("");

