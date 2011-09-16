if(!window.SRAX||window.SRAX.TYPE!="full"){function log(){SRAX.debug("log",arguments)}function info(){SRAX.debug("info",arguments)}function error(){SRAX.debug("error",arguments)}function warn(){SRAX.debug("warn",arguments)}function id(A){return SRAX.get(A)}String.prototype.endWith=function(D,A){var C=A?this.toLowerCase():this,B=A?D.toLowerCase():D;return C.substring(C.length-B.length,C.length)==B};String.prototype.startWith=function(D,A){var C=A?this.toLowerCase():this,B=A?D.toLowerCase():D;return C.substring(0,B.length)==B};function dax(C,B){if(!B){B={}}if(typeof C=="string"){B.url=C}else{B=C}if(!B.id){B.id="undefined"}var A=SRAX.Data.thread[B.id]?SRAX.Data.thread[B.id]:SRAX.DATAThread(B.id);A.setOptions(B,1).request();return A}function abortData(A){if(SRAX.Data.thread[A]){SRAX.Data.thread[A].abort()}}function getData(B,A,F,D,E,C){return dax(B,{cb:A,id:F,cbo:D,anticache:E,destroy:C})}function postData(B,E,A,G,D,F,C){return dax(B,{method:"post",params:E,cb:A,id:G,cbo:D,anticache:F,destroy:C})}if(!window.SRAX){FLAX=SRAX={}}SRAX.extend=function(B,E,D){var A=!D;for(var C in E){if(A||!B.hasOwnProperty(C)){B[C]=E[C]}}return B};(function(B){B.extend(B,{version:"SRAX v1.0.4 build 8",TYPE:"dax",Default:{prefix:"ax",sprt:":",lvl:"_lvl",loader:"loading",loader2:"loading2",loaderSufix:"_loading",DEBUG_AJAX:0,DAX_AUTO_DESTROY:0,DAX_ANTICACHE:0,CHARSET:"UTF-8"},debug:function(K,H){var L=window.console;if(L&&L[K]){try{L[K].apply(L,H)}catch(J){L[K](H.length==1?H[0]:H)}}else{if(window.runtime){var G=[K+": "+H[0]];for(var I=1,D=H.length;I<D;I++){G.push(H[I])}runtime.trace(G)}}},getTime:function(){return new Date().getTime()},init:function(){var H=navigator.userAgent.toLowerCase();B.browser={webkit:/webkit/.test(H),safari:/safari/.test(H),opera:/opera/.test(H),msie:/msie/.test(H)&&!/opera/.test(H),mozilla:/mozilla/.test(H)&&!/(compatible|webkit)/.test(H),air:/adobeair/.test(H)};if(B.browser.msie){for(var G=0,D=[6,7,8],I=D.length;G<I;G++){if(new RegExp("msie "+D[G]).test(H)){B.browser.msieV=D[G]}}}B.addContainerListener(B.Data)},initOnReady:function(){if(B.isReadyInited){return }B.isReadyInited=1;if(B.browser.mozilla||B.browser.opera){B.addEvent(document,"DOMContentLoaded",B.ready)}else{if(B.browser.msie){(function(){try{document.documentElement.doScroll("left")}catch(D){setTimeout(arguments.callee,50);return }B.ready()})()}else{if(B.browser.safari){B.safariTimer=setInterval(function(){if(document.readyState=="loaded"||document.readyState=="complete"){clearInterval(B.safariTimer);B.safariTimer=null;B.ready()}},10)}}}B.addEvent(window,"load",B.ready)},onReady:function(D){if(B.isReady){D()}else{B.readyHndlr.push(D);B.initOnReady()}},ready:function(){if(B.isReady){return }B.isReady=1;for(var H=0,D=B.readyHndlr.length;H<D;H++){try{B.readyHndlr[H]()}catch(G){error(G)}}B.readyHndlr=null},get:function(D){return typeof D=="string"?document.getElementById(D):D},IE_XHR_ENGINE:["Msxml2.XMLHTTP","Microsoft.XMLHTTP"],getXHR:function(){if(window.XMLHttpRequest&&!(window.ActiveXObject&&location.protocol=="file:")){return new XMLHttpRequest()}else{if(window.ActiveXObject){for(var D=0;D<B.IE_XHR_ENGINE.length;D++){try{return new ActiveXObject(B.IE_XHR_ENGINE[D])}catch(G){}}}}},delHost:function(D){if(D&&D.startWith(B.host)){D=D.replace(B.host,"")}return D},host:location.protocol+"//"+location.host,DaxPreprocessor:function(D){},XHRThread:function(I){var H={options:{},inprocess:0,id:I,setOptions:function(K,J){if(!K.url&&K.src){K.url=K.src}if(!K.cb&&K.callback){K.cb=K.callback}if(K.cbo==null&&K.callbackOps!=null){K.cbo=K.callbackOps}if(K.anticache==null&&K.nocache!=null){K.anticache=K.nocache}if(J){D={}}B.extend(D,K);if(D.async==null){D.async=true}D.url=B.delHost(D.url);this.options=D;return H},getOptions:function(){return D},isProcess:function(){return H.inprocess},getXHR:function(){if(!G){G=B.getXHR()}return G},onProgressXHR:function(){var K=H.getXHR();try{K.onprogress=function(L){H.fireEvent("progress",{id:I,thread:H,event:L,position:L.position,total:L.totalSize,percent:Math.round(100*L.position/L.totalSize)})}}catch(J){}return H},openXHR:function(){var L=H.getMethod(),K=H.getXHR(),J=(B.browser.msie&&location.protocol=="file:"&&D.url.startWith("/")?"file://":"")+D.url;if(D.user){K.open(L.toUpperCase(),J,D.async,D.user,D.pswd)}else{K.open(L.toUpperCase(),J,D.async)}return H},sendXHR:function(P,K,N){var O=H.getMethod(),M=H.getXHR();M.onreadystatechange=D.async?K:function(){};var J="setRequestHeader";if(D.cut){M[J]("AJAX_CUT_BLOCK",D.cut)}if(P){M[J]("If-Modified-Since","Sat, 1 Jan 2011 00:00:00 GMT")}M[J]("AJAX_ENGINE","Fullajax");M[J]("X-Requested-With","XMLHttpRequest");if(D.headers){for(var L in D.headers){M[J](L,D.headers[L])}}if(O=="post"){M[J]("Content-Type","application/x-www-form-urlencoded; Charset="+E.CHARSET)}B.showLoading(H.inprocess,H.getLoader());M.send((O=="post")?N:null);if(!D.async){K()}},init:function(){if(H.inprocess){H.abort()}H.inprocess=1;return H},getParams:function(){var J=B.createQuery(D.form),K=H.getMethod();if(D.params){if(J!=""&&!D.params.startWith("&")){J+="&"}J+=D.params}if(K!="post"&&J!=""){if(D.url.indexOf("?")==-1){D.url+="?"+J}else{D.url+=((D.url.endWith("?")||D.url.endWith("&"))?"":"&")+J}}return J},abort:function(){H.inprocess=0;if(!G){return }try{G.isAbort=1;G.abort()}catch(J){}G=null;B.showLoading(0,H.getLoader())},_getLoader:function(J){if(!H.loader){H.loader=D.loader==null?B.getLoader(I,J):B.get(D.loader)}return H.loader},getMethod:function(){var J=D.method?D.method:(D.form?D.form.method:"get");return J&&J.toLowerCase()=="post"?"post":"get"}};var G,D=H.options;B.addEventsListener(H);return H},DATAThread:function(J){var D=B.XHRThread(J),I,H;B.Data.thread[J]=D;B.Data.register(D);D.getLoader=function(){return D._getLoader(1)};D.repeat=function(K){I.params=K;D.request()};D.request=function(){I=D.getOptions();var O=D.getMethod();try{var K={url:I.url,id:J,options:I,thread:D};if(D.fireEvent("beforerequest",K)!==false){H=B.getTime();var M=D.init().getParams(),N=I.anticache!=null?I.anticache:E.DAX_ANTICACHE;if(I.text||I.xml){G({readyState:4,status:I.status==null?200:I.status,responseText:I.text,responseXML:I.xml});I.text=I.xml=null}else{D.onProgressXHR().openXHR().sendXHR(N,G,M)}if(E.DEBUG_AJAX){log(O+" "+I.url+" params:"+M+" id:"+J)}D.fireEvent("afterrequest",K)}}catch(L){D.abort();error(L);throw L}};function G(Q){if(!Q||!Q.readyState){Q=D.getXHR()}try{if(Q.readyState==4){D.inprocess=0;B.showLoading(D.inprocess,D.getLoader());var K=Q.isAbort?-1:Q.status,P=(K>=200&&K<300)||K==304||(K==0&&location.protocol=="file:"),O=Q.responseText,L=Q.responseXML,N={xhr:Q,url:I.url,id:J,status:K,success:P,cbo:I.cbo,callbackOps:I.cbo,options:I,text:O,xml:L,thread:D,responseText:O,responseXML:L,time:B.getTime()-H};D.fireEvent("response",N);if(K>-1&&B.DaxPreprocessor(N)!==false&&I.cb){I.cb(N,J,P,I.cbo);if(E.DEBUG_AJAX){log("callback id:"+J)}}if((I.destroy!=null)?I.destroy:E.DAX_AUTO_DESTROY){D.destroy()}}}catch(M){error(M);D.fireEvent("exception",{xhr:Q,url:I.url,id:J,exception:M,options:I});D.inprocess=0;B.showLoading(D.inprocess,D.getLoader());if((I.destroy!=null)?I.destroy:E.DAX_AUTO_DESTROY){D.destroy()}}}D.destroy=function(){B.Data.thread[J]=null;delete B.Data.thread[J]};return D},showLoading:function(D,I){var G=I?I.style:0;if(G){if(D){if(G.visibility){G.visibility="visible"}else{G.display="block"}}else{function H(L,J){for(var K in L){if(L[K].getLoader()!=I){continue}if(L[K]&&L[K].isProcess()){return 1}}}if(!H(B.Data.thread,1)&&!H(B.Html.thread)){if(G.visibility){G.visibility="hidden"}else{G.display="none"}}}}},getLoader:function(H,D){var G=B.get;if(H){H=G((typeof H=="string"?H:H.id)+E.loaderSufix)}return H||G(D?E.loader2:E.loader)||G(D?E.loader:E.loader2)},encode:encodeURIComponent,decode:decodeURIComponent,createQuery:function(M,D){M=B.get(M);if(!M){return""}if(!D){D={}}var O=[],N=[],U=B.encode,H=M.getElementsByTagName("input");for(var S=0;S<H.length;S++){var G=H[S],I=G.type.toLowerCase(),X=G.name?G.name:G.id,P=U(G.value);if(!X){continue}X=U(X);switch(I){case"text":case"password":case"hidden":case"button":O.push(X);N.push(P);break;case"checkbox":case"radio":if(G.checked){O.push(X);N.push((P==null||P=="")?G.checked:P)}break}}var W=M.getElementsByTagName("select");for(var S=0;S<W.length;S++){var Q=W[S],I=Q.type.toLowerCase(),X=Q.name?Q.name:Q.id;if(!X||Q.selectedIndex==-1){continue}if(I=="select-multiple"){for(var R=0,T=Q.options.length;R<T;R++){if(Q.options[R].selected){O.push(X);N.push(U(Q.options[R].value))}}}else{O.push(U(X));N.push(U(Q.options[Q.selectedIndex].value))}}var L=M.getElementsByTagName("textarea");for(var S=0;S<L.length;S++){var K=L[S],X=K.name?K.name:K.id;if(!X){continue}O.push(U(X));N.push(U(K.value))}var J=[];for(var S=0,T=O.length;S<T;S++){if(D.skipEmpty&&N[S]==""){continue}J.push(O[S]+"="+N[S])}var V=J.join("&")+(M.submitValue||"");M.submitValue=null;return V},addEventsListener:function(D){if(D.prototype){D=D.prototype}D.on=function(G,K,L){if(!(G instanceof Array)){G=[G]}for(var I=0,H=G.length;I<H;I++){var J=G[I];if(!L){this.un(J,K)}if(!this.events){this.events={}}if(!this.events[J]){this.events[J]=[]}this.events[J].push(K)}};D.un=function(G,L,J){if(!(G instanceof Array)){G=[G]}for(var I=0,H=G.length;I<H;I++){var K=G[I];if(!L){return this.unall(K)}var M=this.events?this.events[K]:null;if(M){B.arrayRemoveOf(M,L,!J);this.events[K]=M}}};D.unall=function(G){if(this.events){if(G){delete this.events[G]}else{delete this.events}}};D.fireEvent=function(N,I){var G=this.events?this.events[N]:null;if(G){var L=null,H=[].slice.call(arguments);H.shift();H.push(N);for(var K=0;K<G.length;K++){try{var M=G[K].apply(this,H);if(L!==false&&M!=null){L=M}}catch(J){error(J)}}return L}};return D},addContainerListener:function(G){if(G.prototype){G=G.prototype}var H={},D={};G.register=function(J){var M=H[J.id];if(M){for(var L in M){for(var K=0,I=M[L].length;K<I;K++){J.on(L,M[L][K])}}}for(var L in D){var M=D[L];for(var K=0,I=M.length;K<I;K++){J.on(L,M[K])}}};G.on=function(I,M,L,O){if(!(I instanceof Array)){I=[I]}for(var K=0,J=I.length;K<J;K++){var N=I[K];if(!H[N]){H[N]={}}if(!H[N][M]){H[N][M]=[]}H[N][M].push(L);if(this.thread[N]){this.thread[N].on(M,L,O)}}};G.onall=function(L,K,M){if(!D[L]){D[L]=[]}D[L].push(K);var J=this.thread;for(var I in J){if(J[I]){J[I].on(L,K,M)}}};G.unall=function(N,M,K){if(N){if(M){var I=D[N];B.arrayRemoveOf(I,M,!K);D[N]=I}else{D[N]=[]}}else{D={}}var L=this.thread;for(var J in L){if(L[J]){L[J].un(N,M,K)}}};G.un=function(P,I,K,R){if(!(P instanceof Array)){P=[P]}for(var O=0,L=P.length;O<L;O++){var J=P[O];if(!K){if(J){if(H[J]){if(I){delete H[J][I]}else{delete H[J]}}}else{H={}}var Q={};if(J){Q[J]=this.thread[J]}else{Q=this.thread}for(var N in Q){if(Q[N]){Q[N].unall(I)}}}else{var M=H[J]?H[J][I]:null;if(M){B.arrayRemoveOf(M,K,!R);H[J][I]=M}if(this.thread[J]){this.thread[J].un(I,K,R)}}}};G.fireEvent=function(K,J,I){if(this.thread[K]){return this.thread[K].fireEvent(J,I)}};return G},Data:{thread:{}},Loader:{show:function(){B.showLoading(1,B.getLoader())},hide:function(){B.showLoading(0,B.getLoader())}},parseUri:function(K,H){var D={strictMode:0,key:["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],q:{name:"queryKey",parser:/(?:^|&)([^&=]*)=?([^&]*)/g},parser:{strict:/^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,loose:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/}};var L=H?H:D,J=L.parser[L.strictMode?"strict":"loose"].exec(K);for(var G=0,I={};G<14;G++){I[L.key[G]]=J[G]||""}I[L.q.name]={};I[L.key[12]].replace(L.q.parser,function(N,M,O){if(M){I[L.q.name][M]=O}});return I},showMessage:function(G,D,H){if(D==0){return }alert("Error "+D+" : "+G+"\n"+H)},genId:function(){return F("genid"+E.sprt)+(B.lastGenId?++B.lastGenId:B.lastGenId=1)}});var E=B.Default;var F=function(D){return E.prefix+E.sprt+D};var A=B.placeMark=function(H,D){var G=F("place"+E.sprt+"mark");if(H&&D!=null){H[G]=D}return H?(D==null?H[G]:H):G};var C=function(D){return'<span id="'+D+'" style="display:none"><!--place of script # '+D+"//--></span>"}})(SRAX);SRAX.init()};