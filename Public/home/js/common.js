$(function () {
  /*=== Popup ===*/
  var myPhotoBrowserPopup = $.photoBrowser({
      photos : [
          '//img.alicdn.com/tps/i3/TB1kt4wHVXXXXb_XVXX0HY8HXXX-1024-1024.jpeg',
          '//img.alicdn.com/tps/i1/TB1SKhUHVXXXXb7XXXX0HY8HXXX-1024-1024.jpeg',
          '//img.alicdn.com/tps/i4/TB1AdxNHVXXXXasXpXX0HY8HXXX-1024-1024.jpeg',
      ],
      type: 'popup'
  });
  $(document).on('click','.link',function () {
    myPhotoBrowserPopup.open();
  });
});