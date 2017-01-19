<section class="content bordered-all">
                    
       

    <!-- CONTENT -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="float: left;">Payments</h3>
                <h3 style="float: right"> Balance : <i class="fa fa-inr"></i><?php echo $account->balance; ?></h3>
                <table class="table table-striped table-hover small">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Remaining</th>
                            <th>Sender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($payments as $payment) :
                        ?>
                        <tr class="notification">
                            <td><a href="#">#<?php echo $payment->id; ?></a></td>
                            <td> <?php echo $payment->total_amount; ?></td>    
                            <td><?php echo $payment->amount_received; ?></td>
                            <td style="width:50%;"> <span class="more"><?php echo $payment->remaining_balance; ?></span></td>
                           
                            <td><?php echo $payment->sender->first_name; ?></td>
                            
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