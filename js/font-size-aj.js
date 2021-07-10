$('#js-edit span').each(function () {
  var fontSize = $(this).attr('style')
  console.log(fontSize)
  if (fontSize) {
    if (fontSize.indexOf('12px')) {
      console.log('発見')
      $(this).addClass('is-fz-sm')
    }
  } else {
    console.log('ないよ')
  }
})
