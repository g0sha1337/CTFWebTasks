let clicks = 0;
let progress = 0;
const targetClicks = 6000;

function onClick() {
  clicks += 1;
  if (progress < 600000) {
    progress += 1;
    updateProgressBar();
}
  if (clicks < 600000) {
    document.getElementById("clicks").innerHTML = clicks;
  }

  let url = 'http://127.0.0.1:40002/check_clicks';
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({clicks: clicks}),
  }).then(response => response.json()).then(data => {
    if(data != 'err') {
      document.getElementById("flag").innerHTML = data;
    }
  })
};

function updateProgressBar() {
  const progressBar = document.getElementById('progressBar');
  const progressPercentage = (clicks / targetClicks) * 100; 
  progressBar.style.width = progressPercentage + '%';
}

