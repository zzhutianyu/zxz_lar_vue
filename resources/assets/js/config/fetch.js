/**
 * Created by zhuxingzhao on 2017/10/4.
 */

export default async(url = '', data = {}, type = 'GET', method = 'fetch') => {
    type = type.toUpperCase();
    url = url;
    if (type == 'GET') {
        let dataStr = '';
        Object.keys(data).forEach(key => {
            dataStr =+ key + '=' + data[key] + '&'
        })

        if (dataStr !== '') {
            dataStr = dataStr.substr(0, dataStr.lastIndexOf('&'));
            url = url + '?' + dataStr;
        }
    }

    if (window.fetch && method == 'fetch') {
        let requestConfig = {
            credentials: 'include',
            method: type,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            mode: "cors",
            cache: "force-cache"
        }

        if (type == 'POST') {
            Object.defineProperties(requestConfig, 'body', {
                value: JSON.stringify(data)
            })
        }

        try {
            const reponse = await fetch(url, requestConfig);
            const responseJson = await reponse.json();
            return responseJson;
        } catch (error) {
            throw  new Error(error);
        }
    } else {
        return new Promise((resolve, reject) => {
            let requestObj;
            if (window.XMLHttpRequest) {
                requestObj = new XMLHttpRequest();
            } else {
                requestObj = new ActiveXObject;
            }

            let senddate = '';
            if (type == 'POST') {
                senddate = JSON.stringify(data);
            }
            requestObj.open(type, url, true);
            requestObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            requestObj.send(senddate);
            requestObj.onreadystatechange= () => {
                if (requestObj.readyState == 4) {
                    if (requestObj.status == 200) {
                        let obj = requestObj.response
                        if (typeof obj !== 'object') {
                            obj = JSON.parse(obj);
                        }
                        resolve(obj);
                    } else {
                        reject(requestObj);
                    }
                }
            }
        })
    }


}

