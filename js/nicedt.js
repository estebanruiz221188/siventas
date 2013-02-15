(function (){

	nicedt = function (){return console.log("default")}

	nicedt.nml=0;

	nicedt.gf=function(f){return (f)?nicedt.getf(f):null;}

	nicedt.getf=function(f)
	{
		var a={};
		$(":input", $("#"+f)).each(
			function()
			{
				if(!this.disabled)
				switch(this.type)
				{
					case "radio": if(this.checked){a[this.name]=this.value;} break;
					case "checkbox": a[this.name]=this.checked; break;
					case "submit": break;
					default : a[this.name]=this.value;
				}
			}
		)
		return a;
	}

	nicedt.keys=function(k,f,o){return (k && f)?nicedt.keyboard(k,f,o):null;}

	nicedt.keyboard=function(k,f,o)
	{
		$(document).keydown(function (e){
			k=k.toUpperCase();
			o=o||"";
			c=o.indexOf("c")>=0?event.ctrlKey==true:!event.ctrlKey==true;
			a=o.indexOf("a")>=0?event.altKey==true:!event.altKey==true;
			s=o.indexOf("s")>=0?event.shiftKey==true:!event.shiftKey==true;
			ki=e.which == eval('"'+k+'".charCodeAt(0);');
			if(ki&&c&&a&&s){event.preventDefault(); eval(f);}
		});
		return true;
	}

	nicedt.pj=function(u,d,f){return (u&&d)?nicedt.postjson(u,d,f):null;}

	nicedt.postjson=function(u,d,f)
	{
		f=f||"void";
		$.post(u,d,function(data){eval(f+"(data);");},"json");
	}

	nicedt.msgl=function(m,i,v,t,s,h){return (m&&i)?nicedt.msgline(m,i,v,t,s,h):null;}

	nicedt.msgline=function(m,i,v,t,s,h)
	{
		nicedt.nml++;
		st=s?'style="display:none;"':'';
		s=s||"Clip"; h=h||"Clip"; t=t||4000; v=v||false;
		$("#"+i).append('<div id="msglinediv-'+nicedt.nml+'" '+st+'>'+m+'</div>');
		$('#msglinediv-'+nicedt.nml).show(s);
		if(v)
		{
			setTimeout("$('#msglinediv-"+nicedt.nml+"').hide('"+h+"');",t);
			setTimeout("$('#msglinediv-"+nicedt.nml+"').remove();",t+2000);
		}
		return true;
	}

	nicedt.dtf=function(i,v,t){return (i&&v)?nicedt.datatoform(i,v,t):null;}

	nicedt.datatoform=function(i,v,t){for(val in v){n=t?t[val]:val;$("#"+i+" [name='"+n+"']").val(v[val]);}return true;}

	nicedt.cf=function(n){return n?nicedt.currencyformat(n):null;}

	nicedt.currencyformat=function(n)
	{
		n=n.toString().replace(/$|,/g,'');
		if(isNaN(n)) n="0";
		s=n==(n=Math.abs(n));
		n=Math.floor(n*100+0.50000000001);
		c=n%100;
		n=Math.floor(n/100).toString();
		if(c<10)c="0"+c;
		for(var i=0; i<Math.floor((n.length-(1+i))/3);i++) n=n.substring(0,n.length-(4*i+3))+','+ n.substring(n.length-(4*i+3));
		return (((s)?'':'-')+'$'+n+'.'+c);
	}

	nicedt.reset=function(f){$("#"+f).each(function(){this.reset();})}

	window._=window.nicedt=nicedt;

})(window);