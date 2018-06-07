<div id="box_termo_referencia">{!!$termo_referencia_revisado!!}</div>
<script>
//var str = document.getElementById('box_termo_referencia').innerHTML;
//document.getElementById('box_termo_referencia').innerHTML = str.replace(/<br\s*[\/]?>/gi, "\n");
</script>
<style>
ol
{
    counter-reset: item;
    -webkit-padding-start: 0px!important;
    margin: 0!important;
    padding: 0!important;
    margin-bottom: 20px!important;
}
ol li ol  {
    -webkit-padding-start: 20px!important;
    margin: 0!important;
    padding: 0!important;
    padding-left: 20px!important;
    margin-bottom: 20px!important;
}

ol li ol li ol {
    -webkit-padding-start: -20px!important;
    margin: 0!important;
    padding: 0!important;
    padding-left: -20px!important;
    margin-bottom: 20px!important;
}


li
{
    display: block;
    font-size: 12px!important;
}
li:before
{
    content: counters(item, ".") ". ";
    counter-increment: item
}
</style>