
(function(global,factory){
    if(typeof module ==='object' && typeof module.exports ==='object'){
        module.exports = global.document?
        factory(global,true):
        function(w){
            if(!w.document){
                throw new Error('requires a window with a document');
            }
            return factory(w);

        };
    } else {
        factory( global);
    }
}(typeof window !=='undefined'?window:this,function(window,noGlobal){


    var DOC = window.document;
        HEAD = DOC.getElementsByTagName('head')[0];
        _ua = navigator.userAgent.toLowerCase(),
        _IE = _ua.indexOf('msie') > -1 && _ua.indexOf('opera') == -1,
        _matches = /(?:msie|firefox|webkit|opera)[\/:\s](\d+)/.exec(_ua),
        _V = _matches ? _matches[1] : '0';


    CE = window.CE = function(opt){
        return new CE.fn.init(opt); 
    }
    CE.v='0.1.0';

    //核心函数
    CE.fn = CE.prototype = {
        init:function(opt){
            opt = opt || {};
            this.opt = _CE.extend(this.opt,opt);
            return this;
        },
        aa:function(){
            console.log(this.opt)
        }
    }
    CE.fn.init.prototype = CE.fn;


    //工具函数
    var _CE = {
        isFunction: function( obj ) {
            return toString.call(obj) === "[object Function]";
        },
        isArray: function( obj ) {
            return toString.call(obj) === "[object Array]";
        },
        inArray:function(val, arr) {
            for (var i = 0, len = arr.length; i < len; i++) {
                if (val === arr[i]) {
                    return i;
                }
            }
            return -1;
        },
        grep: function( elems, callback, invert ) {
            var callbackInverse,
            matches = [],
            i = 0,
            length = elems.length,
            callbackExpect = !invert;

            // Go through the array, only saving the items
            // that pass the validator function
            for ( ; i < length; i++ ) {
                callbackInverse = !callback( elems[ i ], i );
                if ( callbackInverse !== callbackExpect ) {
                    matches.push( elems[ i ] );
                }
            }

            return matches;
        },
        each: function (obj, fn) {
            if (_CE.isArray(obj)) {
                for (var i = 0, len = obj.length; i < len; i++) {
                    if (fn.call(obj[i], i, obj[i]) === false) {
                        break;
                    }
                }
            } else {
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        if (fn.call(obj[key], key, obj[key]) === false) {
                            break;
                        }
                    }
                }
            }
        },
        $:function(doc,id){
            return doc.getElementById(id);
        },
        bindEvent:function (el, type, fun, param) {
            var fn = fun;
            if(param){
                fn = function(e){
                    fun.call(this, param);  //继承监听函数,并传入参数以初始化;
                }
            }
            if (el.addEventListener){
                el.addEventListener(type, fn, false);
            } else if (el.attachEvent){
                el.attachEvent('on' + type, fn);
            }
        },
        setAttr:function (el, key, val) {
            if (_IE && _V < 8 && key.toLowerCase() == 'class') {
                key = 'className';
            }
            el.setAttribute(key, '' + val);
        },
        getAttr:function(el,key){
            return el.getAttribute(key);
        },
        removeAttr:function (el, key) {
            if (_IE && _V < 8 && key.toLowerCase() == 'class') {
                key = 'className';
            }
            this.setAttr(el, key, '');
            el.removeAttribute(key);
        },
        unbindEvent:function (el, type, fn) {
            if (el.removeEventListener){
                el.removeEventListener(type, fn, false);
            } else if (el.detachEvent){
                el.detachEvent('on' + type, fn);
            }
        },
        addClass: function( elem, classNames ) {
            _CE.each((classNames || "").split(/\s+/), function(i, className){
                if ( elem.nodeType == 1 && !_CE.hasClass( elem.className, className ) )
                    elem.className += (elem.className ? " " : "") + className;
            });
        },

        // internal only, use removeClass("class")
        removeClass: function( elem, classNames ) {
            if (elem.nodeType == 1)
                elem.className = classNames !== undefined ?
                    _CE.grep(elem.className.split(/\s+/), function(className){
                        return !_CE.hasClass( classNames, className );
                    }).join(" ") :
                    "";
        },

        // internal only, use hasClass("class")
        hasClass: function( elem, className ) {
            return elem && _CE.inArray( className, (elem.className || elem).toString().split(/\s+/) ) > -1;
        },
        extend:function() {

            var target = arguments[0] || {}, i = 1, length = arguments.length, deep = false, options;

            if ( typeof target === "boolean" ) {
                deep = target;
                target = arguments[1] || {};
                i = 2;
            }

            if ( typeof target !== "object" && !_CE.isFunction(target) )
                target = {};

            if ( length == i ) {
                target = this;
                --i;
            }

            for ( ; i < length; i++ ){
                if ( (options = arguments[ i ]) != null )
                    for ( var name in options ) {
                        var src = target[ name ], copy = options[ name ];

                        if ( target === copy ){
                            continue;
                        }

                        if ( deep && copy && typeof copy === "object" && !copy.nodeType )
                            target[ name ] = _CE.extend( deep, 
                                src || ( copy.length != null ? [ ] : { } )
                            , copy );

                        else if ( copy !== undefined )
                            target[ name ] = copy;
                    }
            }
            return target;
        }
    }

    CE = _CE.extend(CE,_CE);

    if ( typeof define === "function" && define.amd ) {
        define( "CE", [], function() {
            return CE;
        });
    }
}));



new function(){
  dom = [];
  dom.isReady = false;
  dom.isFunction = function(obj){
    return Object.prototype.toString.call(obj) === "[object Function]";
  }
  CE.ready = dom.Ready = function(fn){
    dom.initReady();//如果没有建成DOM树，则走第二步，存储起来一起杀
    if(dom.isFunction(fn)){
      if(dom.isReady){
        fn();//如果已经建成DOM，则来一个杀一个
      }else{
        dom.push(fn);//存储加载事件
      }
    }
  }
  dom.fireReady =function(){
    if (dom.isReady)  return;
    dom.isReady = true;
    for(var i=0,n=dom.length;i<n;i++){
      var fn = dom[i];
      fn();
    }
    dom.length = 0;//清空事件
  }
  dom.initReady = function(){
    if (document.addEventListener) {
      document.addEventListener( "DOMContentLoaded", function(){
        document.removeEventListener( "DOMContentLoaded", arguments.callee, false );//清除加载函数
        dom.fireReady();
      }, false );
    }else{
      if (document.getElementById) {
        document.write("<script id=\"ie-domReady\" defer='defer'src=\"//:\"><\/script>");
        document.getElementById("ie-domReady").onreadystatechange = function() {
          if (this.readyState === "complete") {
            dom.fireReady();
            this.onreadystatechange = null;
            this.parentNode.removeChild(this)
          }
        };
      }
    }
  }
}