 <link rel="stylesheet" type="text/css" href="<?= base_url();?>/plugins/editors/quill/quill.snow.css">


 <!--  BEGIN CONTENT AREA  -->
 <div id="content" class="main-content">
    <div class="container">
        <div class="container">

            
         <?php foreach ($textdb->result() as $baris) : ?>
            <div id="basic" class="row layout-spacing layout-top-spacing">
                <div class="col-lg-12">
                    <form>
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4> Belum Bayar </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                               <input type="hidden" name="text"> 
                               <div id="editor-container">
                                <h1>Pesan Pengingat</h1>
                                <br/>
                                
                                <p > <?php echo $baris->text_wa;?> </p>

                            </div>
                            <button class="btn btn-primary" type="submit">Save Text</button>
                        </form>
                        <div class="code-section-container show-code">
                            
                            <button class="btn toggle-code-snippet"><span><?php echo $baris->date;?></span></button>

                            <div class="code-section text-left">
                               <div class="row">
                                   
                               </div>
                           </pre>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>

   
</div>
</div>
</div>

<?php endforeach; ?>

<script src="<?= base_url(); ?>/plugins/editors/quill/quill.js"></script>
<script >
    var quill = new Quill('#editor-container', {
      modules: {
        toolbar: [
        ['bold', 'italic'],
        ['link', 'blockquote', 'code-block', 'image'],
        [{ list: 'ordered' }, { list: 'bullet' }]
        ]
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});

    var form = document.querySelector('form');
    form.onsubmit = function() {
  // Populate hidden form on submit
  var about = document.querySelector('input[name=text]');
  var id = 1;
  var content = document.querySelector("#editor-container").innerHTML
  about.value = JSON.stringify(quill.getContents());
  $.ajax({
    type: "POST",
    url: "text/save",
    data: { 
            id: id, // < note use of 'this' here
            text: about.value 
        },
        success: function(result) {
            alert('ok');
        },
        error: function(result) {
            alert('error');
        }
    });
  
  // No back end to actually submit to!
  alert('Open the console to see the submit data!')
  return false;
};





</script>