<style>
    .lid:hover,
    .lid.active {
        color: #41484c;
        background: rgb(97,183,73);
        text-decoration: none;
        cursor: pointer;
    }   
</style>
{thedivisions}
<li class="lid" id="{divisions}" onclick="getTimeDiv({divisions})">
    {divisions}
</li>
{/thedivisions}
