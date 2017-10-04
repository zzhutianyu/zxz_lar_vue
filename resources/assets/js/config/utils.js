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


