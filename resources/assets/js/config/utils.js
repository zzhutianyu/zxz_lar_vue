/**
 * Created by zhuxingzhao on 2017/10/4.
 */
/**
 *  获取localStorage
 */
export const getStore = name => {
    if (!name) return;
    return window.localStorage.getItem(name);
}

/**
 * 删除 localStorage
 */

export const rmStore = name => {
    if (!name) return;
    window.localStorage.removeItem(name);
}

/**
 * 获取style 样式
 */
export const getStyle = (ele, attr, NumberMode = 'int') => {
     let target;
     // scrollTop 获取方式不同, 没有他不属于style, 而且只有document.body 才能用
    if (attr === 'scrollTop') {
        target = ele.scrollTo;
    } else if (ele.currentStyle) {
        target = ele.currentStyle[attr];
    } else {
        target = document.defaultView.getComputedStyle(ele, null)[attr];
    }
    return NumberMode == 'float' ? parseFloat(target) : parseInt(target);
}

/**
 *  函数节流
 */
export const throttle = function(method, delay) {
    var last = 0;
    return function () {
        var now = +new Date();
        if(now - last > delay) {
            method.apply(this, arguments);
            last = now;
        }
    }
}

/**
 *  函数防抖
 */
export const debounce = function (method, delay) {
    var timer = null;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            method.apply(context, args);
        }, delay);
    }
}


