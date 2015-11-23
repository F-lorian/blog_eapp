
function toggleClass (obj, Class) {
  $(obj).toggleClass(Class)
}

function addClass (obj, Class) {
  $(obj).addClass(Class)
}

function removeClass (obj, Class)	{
  $(obj).removeClass(Class)
}

$(document).ready(function ()	{
  $('#post').elastic()
})
