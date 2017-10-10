function SetLanguage(val)
{
  var url = location.href;
  if(val=="1")
  {
    url= "?fids=1";
  }
  if(val=="2")
  {
    url= "?fids=2";
  }
  if(val=="3")
  {
    url= "?fids=3";
  }
  if(val=="4")
  {
    url= "?fids=4";
  }
  if(val=="5")
  {
    url= "?fids=5";
  }
  if(val=="6")
  {
    url= "?fids=6";
  }
  location.href=url;
}