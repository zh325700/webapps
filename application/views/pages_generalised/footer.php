            <div class="container">
                    <center><p style="font-size:15px;">Copyright: HCI/webapps project-team 2 &copy; 2017</p></center>
            </div>
            <div>
                <select name="language" id="language">
                    <option id="valuea" value="Dutch">Nedelands</option>
                    <option id="valueb" value="English">English</option>
                </select>
            </div>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded',function() {
                document.querySelector('select[name="language"]').onchange=changeEventHandler;
            },false);

            function changeEventHandler(event) {
                var value=event.target.value;
                document.getElementById("valueb").setAttribute('value',document.getElementById("valuea").getAttribute('value'));
                document.getElementById("valuea").setAttribute('value',value);
            }
      </script>
    </body>
</html>
