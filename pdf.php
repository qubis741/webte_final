<script src="js/xepOnline.jqPlugin.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<!-- hodnotu 'text' treba zmenit na ID DIVu ktory chceme vygenerovat do formatu PDF !!! -->
<a href="#" onclick="return xepOnline.Formatter.Format('text',{render:'download'});" class="redButton">
Vygeneruj PDF
</a>



<div id="edit_content">
<p>This is a test sd as sda
sadsadsa
</p>    
</div>

<button id="clickme">Vygeneruj super ebook</button>

<script>
<!-- edit_content treba nahradit ID DIVu ktory chceme generovat -->
var htmlData = $('#edit_content').html();

// bind to the button with clickme ID
$("button#clickme").click(function() {
    $.ajax({
        url: 'pdf_ebook.php',
        type: 'GET', // GET is default
        data: {
            html: htmlData
            // in PHP, use $_POST['yourData']
        },
        success: function(msg) {
            alert('SUCCESS' + msg);
        },
        error: function(msg) {
            alert('AJAX request failed!' + msg);
        }
    });
});
</script>