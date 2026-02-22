<header id="masthead" class="site-header submit-manuscript" role="banner">
  <div class="home-link">
<h2>Submit Manuscript</h2><!-- <h1 class="site-title"></h1>
<h2 class="site-description"></h2> -->
</div>
</header>
<div id="main" class="site-main"><style type="text/css">
  #errorfiled
  {
    color: #CB4444;
  }
  #colophon{margin:0 !important;}
  .disp_msg
  {
    position: absolute;
    display: none;
    width: 80%;
    /* top: 50%; */
    left: 10%;
    text-align: center;
    background-color: #47D55E;
    color: #fff;
    padding: 15px;
    z-index: 99;
  }
  .error {
    color: #ff0000 !important;
    font-weight: normal;
  }
</style>

<div class="disp_msg">
  We will Get Back To You Soon
</div>
<div class="hentry">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">         
        <div id="">
          <h2 class="header_h">Instructions</h2><br>
          <p>Avens Publishing Group is an international Open Access Publisher dealing with Scientific, Technical and Medical Journals. We accept wide range of quality manuscripts of Research, Review, Case reports, Short communications, Letter to Editor Etc. </p>
          <p>Please read the following instructions before submission of the manuscript</p>
        </div>
      </div>    
      <div class="row">
        <div class="col-sm-8">      
          <div class="journal-text-box">  

            <form name="form" id="manuscript_form" enctype="multipart/form-data"  method="post">          
              <div class="form-group">
                <div class="col-sm-6">
                  <input name="firstname" type="text" value="" id="firstname" size="30" class="form-control" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                  <input name="lastname" type="text" value="" id="lastname" size="30" class="form-control" placeholder="Last Name">
                </div>
              </div>        
              <div class="form-group">
                <div class="col-sm-6">
                  <input name="tellno" type="text" value="" id="tellno" size="30" class="form-control" placeholder="Tel No">
                </div>
                <div class="col-sm-6">
                  <input name="phoneno" type="text" value="" id="phoneno" size="30" class="form-control" placeholder="Mobile No">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <input name="email" type="text" value="" id="email" size="30" class="form-control" placeholder="Email">
                </div>
                <div class="col-sm-6">
                  <input name="alt_email" type="text" value="" id="alt_email" size="30" class="form-control" placeholder="Alternate Email">
                </div>
              </div>        
              <div class="form-group">
                <div class="col-sm-6">
                  <select name="country" class="select-country form-control" id="country">
                    <option value="#">Select Country</option>
                    <?php foreach ($country_info as $key => $value) {
                      echo '<option value="'.$value['country_name'].'">'.$value['country_name'].'</option>';
                    } ?>          
                  </select>
                </div>
                <div class="col-sm-6">
                  <select name="journal" class="select-journal form-control" id="journal" type="text">
                    <option value="#">Select Journal</option>                  
                    <option value="Advances in Diabetes &amp; Endocrinology">Advances in Diabetes &amp; Endocrinology </option>
                    <?php foreach ($category_info as $key => $value) {
                      echo '<option value="'.$value['journal_name'].'">'.$value['journal_name'].'</option>';
                    } ?>

                    </select>
                </div>
              </div>              
                <div class="form-group">
                  <div class="col-sm-12">
                    <input name="article" type="text" value="" id="article" size="30" class="form-control" placeholder="Article">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input name="cauthor" type="text" value="" size="30" id="cauthor" class="form-control" placeholder="Corresponding Author">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="upload-box">
                      <p>Allowed file types are <b>DOCX, PDF, TAR, ZIP, RAR.</b> Max file size 25MB.<br/>Note: If you have more than one file, we request you to make it as zip or rar and upload it.<br/></p>                      
                      <!-- <div class="file-type-box">
                      <label class="radio-inline">
                        <input type="radio" value="zip" name="file_type" checked>DOCX
                      </label>
                      <label class="radio-inline">
                        <input type="radio" value="pdf" name="file_type">PDF
                      </label>
                      <label class="radio-inline">
                        <input type="radio" value="tar" name="file_type">TAR
                      </label>
                      <label class="radio-inline">
                        <input type="radio" value="zip" name="file_type">ZIP
                      </label>
                      <label class="radio-inline">
                        <input type="radio" value="rar" name="file_type">RAR
                      </label>
                      </div> -->
                      <!-- <p><input type="file" name="userfile" value="Choose Files" size="25" class="input-file" rel="0" id="userfile"></p>            
                      <p><input type="file" name="userfile1" value="Choose Files" size="25" id="userfile1" rel="1" class="input-file"></p>
                      <p><input type="file" name="userfile2" value="Choose Files" size="25" id="userfile2" rel="2" class="input-file"></p>
                      <span class="add-file">Add Another File</span>             -->

                    </div>
                  </div>
                </div>
                <div class="form-group file-upload-group">
                <div class="col-sm-12 file-upload-box">
                  <p><input type="file" name="userfile" value="Choose Files" size="25" class="input-file" rel="0" id="userfile"></p>
                  </div>
                </div>   
                
                <div class="form-group file-upload-btn-group">
                  <div class="col-sm-2"> 
                    <!-- <input type = "submit" value = "upload"  class="btn btn-success"/>  -->
                    <input type="submit" class="post postbtn" style="border: none;outline:none;" name="submit" value="Submit" />
                    <!-- <input type="button" class="post postbtn" style="border: none;outline:none;" value="Post" /> -->
                  </div>
                  <div class="col-sm-10 server-msg"><div class="alert" role="alert"></div></div>
                </div>                
              </form>


            </div>
          </div>
          <div class="col-sm-4">	<div id="tertiary" class="sidebar-container" role="complementary">
            <div class="sidebar-inner">
              <div class="widget-area">
                <aside id="text-4" class="widget widget_text">			<div class="textwidget"><div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/www.avensonline.org" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="260" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=562268420549512&amp;color_scheme=light&amp;container_width=257&amp;header=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.avensonline.org&amp;locale=en_US&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=260"><span style="vertical-align: bottom; width: 260px; height: 213px;"><iframe name="f1ca319c07b9c2" width="260px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="https://www.facebook.com/v2.0/plugins/like_box.php?app_id=562268420549512&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df14a1087f1284bc%26domain%3Dwww.avensonline.org%26origin%3Dhttp%253A%252F%252Fwww.avensonline.org%252Ff6c33a7850a9bc%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=257&amp;header=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.avensonline.org&amp;locale=en_US&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=260" style="border: none; visibility: visible; width: 260px; height: 213px;" class=""></iframe></span></div></div>
                </aside>			</div><!-- .widget-area -->
              </div><!-- .sidebar-inner -->
            </div><!-- #tertiary -->
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">

  function sendData()
  {

    var data = new FormData($('#manuscript_form')[0]);


    $.ajax({
      type:"POST",
      url:"<?php echo base_url('page/save_submit_manuscript_info');?>",
      data:data,
      mimeType: "multipart/form-data",
      contentType: false,
      cache: false,
      processData: false,
      success:function(temp)
      {        
        var ser_obj = JSON.parse(temp);
        if(temp.status) {
          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message);
        } else {
          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message);
        }
        setTimeout(function(){
         $('.server-msg').find('.alert').fadeOut(2000); 
          $('#manuscript_form').trigger('reset');         
        },2000);
      }
    });     
  }
</script>