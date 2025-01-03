<?php require __DIR__ . '/partials/layout_start.php'; ?>

<h2>Shorten your link</h2>
<input type="text" id="longUrl" placeholder="Put Your Link">
<button id="shortenBtn">Shorten</button>

<div id="result"></div>

<script>
  document.getElementById('shortenBtn').addEventListener('click', function() {
    const longUrl = document.getElementById('longUrl').value;
    if (!longUrl) {
      alert("Insert a link!");
      return;
    }

    fetch('/create', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ longUrl: longUrl })
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        document.getElementById('result').innerHTML = 
          `<p style="color:red;">Error: ${data.error}</p>`;
      } else {
        document.getElementById('result').innerHTML = 
          `<p>Your link: <a href="${data.shortUrl}" target="_blank">${data.shortUrl}</a></p>`;
      }
    })
    .catch(err => {
      document.getElementById('result').textContent = "Error while requesting a server";
    });
  });
</script>

<?php require __DIR__ . '/partials/layout_end.php'; ?>
