
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        //alert(content);
		function Sound(url, vol, autoplay, loop)
{
    var that = this;

    that.url = (url === undefined) ? "" : url;
    that.vol = (vol === undefined) ? 1.0 : vol;
    that.autoplay = (autoplay === undefined) ? true : autoplay;
    that.loop = (loop === undefined) ? false : loop;
    that.sample = null;

    if(that.url !== "")
    {
        that.sync = function(){
            that.sample.volume = that.vol;
            that.sample.loop = that.loop;
            that.sample.autoplay = that.autoplay;
            setTimeout(function(){ that.sync(); }, 60);
        };

        that.sample = document.createElement("audio");
        that.sample.src = that.url;
        that.sync();

        that.play = function(){
            if(that.sample)
            {
                that.sample.play();
            }
        };

        that.pause = function(){
            if(that.sample)
            {
                that.sample.pause();
            }
        };
    }
}

var test = new Sound("https://www.soundjay.com/misc/censor-beep-01.mp3");
test.play();
		window.open(content);
		//document.write('<a href="'+content+'">shivaji meenuggu</a>');
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    