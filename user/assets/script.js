
$(document).on('change', '#inputupload', function() {
  var filesCount = $(this)[0].files.length;
  var textbox = $(this).prev();

  if (filesCount === 1) {
    var fileName = $(this).val().split('\\').pop();
    textbox.text(fileName);
  } else {
    textbox.text(filesCount + ' files selected');
  }

  if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview");
    dvPreview.html("");            
    $($(this)[0].files).each(function () {
      var file = $(this);                
      var reader = new FileReader();
      reader.onload = function (e) {
        var img = $("</img />");
        img.attr("style", "width: 100%;");
        img.attr("class", "rounded");
        img.attr("src", e.target.result);
        dvPreview.append(img);
      }
      reader.readAsDataURL(file[0]);                
    });
  } else {
  alert("This browser does not support HTML5 FileReader.");
  }
});
