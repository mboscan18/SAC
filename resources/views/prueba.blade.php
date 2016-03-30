<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>


    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- bootstrap theme -->
    {!!Html::style('css/bootstrap-theme.css')!!}


  </head>
  <body >
  	
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" id="boton">
  Launch demo modal
</button>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"  id="myModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Form Tittle</h4>
            </div>
            <div class="modal-body">

                <form role="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile3">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



    
  </body>
</html>


    {!!Html::script('js/jquery.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}


<script type="text/javascript">
jQuery(document).ready(function(){

    $('#boton').on( 'click', function () {
        $('#myModal').appendTo("body").modal("show");
    } );

});
</script>