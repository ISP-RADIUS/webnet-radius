<section class="content bordered-all">
                    
       

    <!-- CONTENT -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <h3>Notifications</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Medium</th>
                            <th>Text</th>
                            <th>Status</th>
                            <th>Sender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($notifications as $notification) :
                        ?>
                        <tr class="notification">
                            <td><a href="#">#<?php echo $notification->id; ?></a></td>
                            <td> <?php echo $notification->created_at; ?></td>    
                            <td><?php echo $notification->type; ?></td>
                            <td style="width:50%;"> <span class="more"><?php echo $notification->text; ?></span></td>
                            <td>
                                <span class="label label-success"><?php echo "delivered" ?></span>
                            </td>
                            <td><?php echo $notification->sender->first_name; ?></td>
                            
                        </tr>
                        
                        <?php
                            endforeach;
                        ?>

                    </tbody>
                </table>
               
                <?php
                        echo $page_nav;
                    ?>
            </div>
           
        </div>
    </div>

</section>

<style>

a.morelink:visited {
    color: #428bca;
}
a.morelink {
    text-decoration:none;
    outline: none;
    color: #428bca;
}
.morecontent span {
    display: none;
}

</style>

<script>
    $(document).ready(function() {
    var showChar = 60;
    var ellipsestext = "...";
    var moretext = "more";
    var lesstext = "less";
    $('.more').each(function() {
        var content = $(this).html();


        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });


});
</script>