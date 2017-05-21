;(function (){
  'use strict'

  $(".card_video").on("click", function (e) {
    var video = e.currentTarget.dataset.video
    $(".panel-video").slideDown()
    var template = `<iframe class="youtube-player" type="text/html" width="640" height="335" 
          src="http://www.youtube.com/embed/${video}" frameborder="0">
    </iframe>`
    $("#video-panel").html(template)
  })

  $("#closeVideo").on("click", function (e) {
    e.preventDefault()
    $(".panel-video").slideUp()
  })

})()