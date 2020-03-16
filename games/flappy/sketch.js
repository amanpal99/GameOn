var bird;
var pipes = [];
var grass = [];
var build = [];
var cloud = [];
var score = 0;
var topscore = 0;
var lastscore = 0;
var hit = false;
var play = true;
var run = 0;

function clearRecord()
{
  location.href = '../../php/gameData.inc.php?gid=5'+'&scr='+score;
}

function setup() {
  var canvas = createCanvas(600, 600);
  canvas.parent('sketch-holder');

  bird = new Bird();
}

function draw() {
  //draw sky
  background(98,195,203);
  //draw cloud base
  noStroke();
  fill(238);
  rect(0, 375, width, 200);
  stroke(0);
  //draw cloud tops
  for (var i = cloud.length-1; i >= 0; i--) {
    cloud[i].show();
    if(play) cloud[i].update();

    if (cloud[i].offscreen()) {
      cloud.splice(i, 1);
    }
  }
  //draw buildings
  for (var i = build.length-1; i >= 0; i--) {
    build[i].show();
    if(play) build[i].update();

    if (build[i].offscreen()) {
      build.splice(i, 1);
    }
  }
  //draw grass base
  noStroke();
  fill(70, 190, 67);
  rect(0, 550, width, 50);
  stroke(0);
  //draw grass mounds
  for (var i = grass.length-1; i >= 0; i--) {
    grass[i].show();
    if(play) grass[i].update();
    if (grass[i].offscreen()) {
      grass.splice(i, 1);
    }
  }
  //draw pipes and check to see if contact is made with bird
  for (var i = pipes.length-1; i >= 0; i--) {
    pipes[i].show();
    if(play) pipes[i].update();

    if (pipes[i].hits(bird)) {
      hit = true;
      play = false;
    }

    if (pipes[i].offscreen()) {
      pipes.splice(i, 1);
    }
  }
  //bird
  if(play) bird.update();
  bird.show();
  //quickly generate grass, buildings, and clouds for first 18 frames (rest added from off screen as game plays)
  if(frameCount < 18) {
    grass.push(new Grass(random(60, 100), random(30, 50)));
    if(frameCount % 2 == 0) build.push(new Build(random(3, 9), random(0, 100)));
    cloud.push(new Cloud(random(60, 100), random(30, 80)));
  }
  //add grass, buildings, clouds as game progresses
  if (play && run % 15 == 0) grass.push(new Grass(random(60, 100), random(30, 50)));
  if (play && run % 30 == 0) build.push(new Build(random(4, 9), random(0, 100)));
  if (play && run % 60 == 0) cloud.push(new Cloud(random(60, 100), random(30, 80)));
  //add new pipes as game plays
  if (run % 75 == 0) {
    pipes.push(new Pipe());
  }
  //if game is playing and you don't hit a pipe, score goes up as you go thru
  if (run % 75 == 35 && run > 35 && (!hit)) {
    score = score + 10;
  }

  if(score>topscore) topscore = score;

  //scoreboard
  fill(238, 238, 238, 200);
  rect(450, 5, 140, 50);

  noStroke();
  textSize(48);
  textAlign(CENTER);
  fill(0);
  text(score, width/2 ,height/2);
  textSize(16);
  textAlign(LEFT);
  text("Current:", 460, 20);
  text("Last:", 460, 35);
  text("Best:", 460, 50);
  textAlign(RIGHT);
  text(score, 580, 20);
  text(lastscore, 580, 35);
  text(topscore, 580, 50);

  if(play) run++;
  else {
    clearRecord();
    button = createButton('Play Again');
    button.size(80, 50);
    button.parent('sketch-holder');
    button.position(width/2 - 35, height/2 + 10);
    button.mousePressed(refresh);
    noLoop();
  }
}

function refresh()
{
  location.reload(true);
}

function reset() {
  if(score>0) lastscore = score;
  score = 0;
  pipes = [];
  bird = new Bird();
  run = 0;
  button.hide();
  hit = false;
  play = true;
}

function keyPressed(){
  if(keyCode === 32){
    bird.up();
  }
}

function mousePressed() {
  if(mouseX>0 && mouseX<width && mouseY>0 && mouseY<height) {
    bird.up();
    if(mouseX<250 || mouseX>350 || mouseY<300 || mouseY>350) return false; //disable double tap zoom on mobile but allow click of reset button
  }
}
