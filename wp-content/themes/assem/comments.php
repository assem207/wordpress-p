<?php 
  if(comments_open())  {?>
 
        <h3 class="comments-count"> <?php comments_number('0 comments','1 comment' ,'% comments') ?> </h3>
        <?php
        echo "<ul class='list-unstyles  comment-list'>";
       $comments_arguments=  array(
          'max_depth '> 3,//The maximum comments depth. 
          'type'=> 'comment',//The style of list ordering. Accepts 'ul', 'ol', or 'div'.
            //'div' will result in no additional list markup. Default 'ul'.
          'reverse_top_level'=>true ,//Ordering of the listed comments. If true, will display newest comments first. Default null.
     

         );
       wp_list_comments($comments_arguments) ;
       echo "</ul>" ;
       echo "<hr>";

        $comment_form_argument = array(
            'fields'  =>  array(
                'author'=>'<div class="form-group"><label>name</label><input  type="text" class="form-control"></div>',
                 'email'=>'<div class="form-group"><label>email</label> <input type="email" class="form-control">
                 <span> Your email address will not be published.</span>
                 </div>',
                  'url'=>'<div class="form-group">
                   <label>url</label><input  type="text" class="form-control">
                      </div>',
                  
              ),
                 'comment_field'=>'<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true" ></textarea></p>',
                 'label_submit'=> 'send comment' ,
                 'class_submit' => 'btn btn-warning border border-secondary mt-2 submit',
                 'title_reply'=>'Add a comment',
                // 'comment_notes_before'=>'',
                 //'comment_notes_after'=> 'comment_notes_after',  add textafter textarea comment
                            );
          comment_form($comment_form_argument);
  }
     else
     {
      
       echo "comennts are disabled";
       
   }


?>