;(function () {
  'use strict'

  $(".see").on("click", handleSee)
  $(".new").on("click", handleNew)

  function handleNew (e) {
    var id = e.currentTarget.dataset.id
    $("#id").val(id)
    
    $("#tabla_principal").slideUp()
    $(".containerForm").slideDown()
  }

  function handleSee (e) {
    var id = e.currentTarget.dataset.id
    $("#kardex").load(`templates/kardex.php?id=${id}`)
    $("#kardex").slideDown()
    $("#tabla_principal").slideUp()
  }

})()