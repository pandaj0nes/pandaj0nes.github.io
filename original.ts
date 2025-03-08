<!DOCTYPE html>
<html>
<head>
<title>Steambutt Ski</title>
<style>
  body {
    margin: 0;
    overflow: hidden;
    background: white;
  }
  #gameCanvas {
    width: 100%;
    height: 100vh;
    display: block;
  }
  #characterSelect {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
  }
  #characterSelect button {
    padding: 10px 20px;
    margin: 10px;
    font-size: 16px;
    cursor: pointer;
  }
</style>
</head>
<body>
  <div id="characterSelect">
    <h2>Choose Your Character</h2>
    <button onclick="startGame('snowboarder.png')">Snowboarder</button>
    <button onclick="startGame('pandaboarder.png')">Panda Jones</button>
    <button onclick="startGame('astroboarder.png')">Astronaut</button>
    <button onclick="startGame('ralphboarder.png')">Ralphie</button>
  </div>
  <canvas id="gameCanvas"></canvas>

  <script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const characterSelect = document.getElementById('characterSelect');

    const mountainsImg = new Image();
    mountainsImg.src = 'mountains.png';
    const skiLodge = new Image();
    skiLodge.src = 'ski_lodge.png';
    const treeImg = new Image();
    treeImg.src = 'tree.png';
    const rockImg = new Image();
    rockImg.src = 'rock.png';
    const skierImg = new Image();
    skierImg.src = 'skier.png';
    
    let playerImg = new Image();
    let playerX = 100;
    let playerY = canvas.height / 2;
    let playerSize = 48;
    let scrollSpeed = 5;
    let progress = 0;
    let gameRunning = false;
    let startTime;
    let obstacles = [];
    let computerSkiers = [];
    let keys = {};
    let score = 0; // Add this line
    
    function startGame(character) {
      playerImg.src = character;
      characterSelect.style.display = 'none';
      gameRunning = true;
      progress = 0;
      score = 0; // Reset score
      startTime = Date.now();
      obstacles = [];
      computerSkiers = [];
      generateObstacles();
      generateComputerSkiers();
      gameLoop();
    }

    document.addEventListener('keydown', (e) => { keys[e.key] = true; });
    document.addEventListener('keyup', (e) => { keys[e.key] = false; });

    function generateObstacles() {
      setInterval(() => {
        if (!gameRunning) return;
        let type = Math.random() < 0.5 ? 'tree' : 'rock';
        obstacles.push({
          x: canvas.width,
          y: 180 + Math.random() * (canvas.height - 220),
          width: 48,
          height: 48,
          type: type
        });
      }, 400);
    }

    function generateComputerSkiers() {
      setInterval(() => {
        if (!gameRunning) return;
        computerSkiers.push({
          x: canvas.width + Math.random() * 500,
          y: 180 + Math.random() * (canvas.height - 220),
          width: 48,
          height: 48,
          speed: 2 + Math.random() * 2
        });
      }, 800);
    }

    function update() {
      if (!gameRunning) return;

      progress += scrollSpeed;
      score = Math.floor(progress / 10); // Update score based on progress

      if (Date.now() - startTime >= 30000) {
        gameOver(true);
      }

      if (keys.ArrowUp) playerY -= 5;
      if (keys.ArrowDown) playerY += 5;
      playerY = Math.max(180, Math.min(canvas.height - 140, playerY));

      for (const skier of computerSkiers) {
        skier.x -= skier.speed;
      }
      
      for (const obstacle of obstacles) {
        obstacle.x -= scrollSpeed;
      }
      
      obstacles = obstacles.filter(obstacle => obstacle.x + obstacle.width > 0);
      computerSkiers = computerSkiers.filter(skier => skier.x + skier.width > 0);

      for (const obstacle of obstacles) {
        if (playerX < obstacle.x + obstacle.width &&
            playerX + playerSize > obstacle.x &&
            playerY < obstacle.y + obstacle.height &&
            playerY + playerSize > obstacle.y) {
          gameOver(false);
        }
      }

      for (const skier of computerSkiers) {
        if (playerX < skier.x + skier.width &&
            playerX + playerSize > skier.x &&
            playerY < skier.y + skier.height &&
            playerY + playerSize > skier.y) {
          gameOver(false);
        }
      }
    }

    function draw() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      
      let bgX = -progress * 0.5 % canvas.width;
      ctx.drawImage(mountainsImg, bgX, 0, canvas.width, 200);
      ctx.drawImage(mountainsImg, bgX + canvas.width, 0, canvas.width, 200); 
      
      for (const obstacle of obstacles) {
        const img = obstacle.type === 'rock' ? rockImg : treeImg;
        ctx.drawImage(img, obstacle.x, obstacle.y, obstacle.width, obstacle.height);
      }

      for (const skier of computerSkiers) {
        ctx.drawImage(skierImg, skier.x, skier.y, skier.width, skier.height);
      }

      ctx.drawImage(playerImg, playerX, playerY, playerSize, playerSize);
      
      // Display the score
      ctx.fillStyle = 'black';
      ctx.font = '24px Arial';
      ctx.fillText('Score: ' + score, 10, 30);

      if (Date.now() - startTime >= 29500) {
        ctx.drawImage(skiLodge, canvas.width / 2 - 180, canvas.height / 2 - 120, 360, 240);
      }
    }

    function gameLoop() {
      update();
      draw();
      if (gameRunning) {
        requestAnimationFrame(gameLoop);
      }
    }

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();
  </script>
</body>
</html>