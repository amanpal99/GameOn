function Grass(l, w) {
  if(frameCount<18) this.x = frameCount*40; //if beginning of game quickly add grass
  else this.x = width+100;                  //normal grass added off screen
  this.speed = 4;

  this.show = function() {
    push();
      noStroke();
      fill(70, 190, 67);
      ellipse(this.x, 550, l, w);
    pop();
  }

  this.update = function() {
    this.x -= this.speed;
  }

    this.offscreen = function() {
    if (this.x < -100) {
      return true;
    } else {
      return false;
    }
  }

}

function Build(w, h) {
  if(frameCount<18) this.x = frameCount*40; //if beginning of game quickly add buildings
  else this.x = width+100;                  //normal buildings added off screen
  this.speed = 3;
  this.neww = floor(w) * 10;                //make building width multiple of 10
  if (this.neww % 20 == 0) this.neww = this.neww + 10; //make sure building width is odd odd 10s (30, 50, etc) so window placement is symetric
  this.show = function() {
    push();
      //draw building
      stroke(0);
      fill(213, 234, 202);
      rect(this.x, 500-h, this.neww, 100+h);
      //add windows
      for (var j = 0; j < 200; j+=20) {
        for (var i = 0; i < this.neww - 20; i+=20) {
          fill(255);
          rect(this.x + i + 10, 500 + j - h + 10, 10, 10);
        }
      }
    pop();
  }

  this.update = function() {
    this.x -= this.speed;
  }

    this.offscreen = function() {
    if (this.x < -100) {
      return true;
    } else {
      return false;
    }
  }
}

function Cloud(l, w) {
  if(frameCount<18) this.x = frameCount*40; //if beginning of game quickly add clouds
  else this.x = width+100;                  //normal clouds added off screen
  this.speed = 1;

  this.show = function() {
    push();
      noStroke();
      fill(238);
      ellipse(this.x, 375, l, w);
    pop();
  }

  this.update = function() {
    this.x -= this.speed;
  }

    this.offscreen = function() {
    if (this.x < -100) {
      return true;
    } else {
      return false;
    }
  }
}
