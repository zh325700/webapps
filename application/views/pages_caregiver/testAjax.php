<div class="row">
    <h1>This is test of the AJAX</h1>
    <div class="col-md-2">
        <button id="getChartData">Get External Content</button>
        <input type="text" id="fullname">
    </div>
    <div class="col-md-10" id="changeDiv">
        <span id="result1"></span>
    </div>
    
</div>

<script>
    $(document).ready(function () {
        $("#getChartData").click(function(){
            var fullname = $('#fullname').val();
            $.ajax({
                type:'POST',
                data:{fullname:fullname},
                url:"<?php echo base_url(); ?>index.php/CaregiverOperateResident/getScoreWeek",
                success:function(result){
                    $('#result1').html(result);
                }
            });
        });
    });
</script>



<!--<script>
    function problemClicked(target) {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>index.php/employeeDetailedProblem/choseProblem",
            data: {problemID: target.getAttribute("problemid"), residentID: idResident},
            success: function (data)
            {
                var obj = jQuery.parseJSON(data);
                row = document.getElementById('changeDiv');
                row.innerHTML = obj.problem;

                title = document.getElementsByClassName("title-text")[0];
                title.innerHTML = obj.problemObj.questionText;
                $(".popup").fadeIn(300);
                $("body").css("overflow", "hidden");
                //console.log(obj.problem);
                //console.log(obj.labels);
                //console.log(obj.chartData);
                //console.log(obj.labeltext);
                fillChartComparison(obj.labels, obj.chartData, obj.labeltext);

                //Answer history chart part
                // console.log(obj.history);
                // var history = document.getElementById("history");
                history.innerHTML = obj.history.length + " " + obj.history[0]["Question_translationID"];
                fillAnswerHistoryChart(obj);
            },
            error: function (data) {
                console.log(status.responseText);
                alert(data.status);
            }
        }
        );
    }
</script>-->