export default class MediaHandler {
    getPermissions() {
        return new Promise((res, rej) => {
            navigator.mediaDevices.getUserMedia({video: true, audio: true})
                .then((stream) => {
                    console.log('webcam attivata');
                    res(stream);
                })
                .catch(err => {
                    throw new Error(`Unable to fetch stream ${err}`);
                })
        });
    }
}