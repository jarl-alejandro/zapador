;(function () {
  'use strict'

  var maester = new MaesterDetail()  

  $("#containerTable").load("templates/table.php")
  $("#materiasContainer").fadeIn()

  $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)

  $("#ver-video").on("click", function (e) {
    e.preventDefault()
    var video = e.currentTarget.dataset.video

    if(video == "") {
      toast("Debe selecionar le curso para ver el video")
    }else {
      $(".panel-video").slideDown()
      var template = `<iframe class="youtube-player" type="text/html" width="640" height="335" 
          src="http://www.youtube.com/embed/${video}" frameborder="0">
      </iframe>`
      $("#video-panel").html(template)
    }
  })

  $("#closeVideo").on("click", function (e) {
    e.preventDefault()
    $(".panel-video").slideUp()
  })

   function closeHandle (e) {
    e.preventDefault()
    maester.close()
  }

  function saveHandle (e) {
    e.preventDefault()
    alert("Save")
  }


})()