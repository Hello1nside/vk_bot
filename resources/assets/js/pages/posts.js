const example = new Vue({
    el: '#app',
    delimiters: ['${', '}'],
    http: {
        emulateJSON: true,
        emulateHTTP: true
    },
    data: {
        loading: false,
        portion: 0,
        posts: [],
        statuses: {
            0: {color: 'red', text: 'Rejected'},
            1: {color: 'orange', text: 'New'},
            2: {color: 'green', text: 'Approved'},
            3: {color: 'black', text: 'Posted'},
        },
        showImgPopup: false,
        popupImgSrc: '',
        filterBySt: {
            options: [
                {id: 1, st: 'New'},
                {id: 2, st: 'Approved'},
                {id: 0, st: 'Rejected'},
                {id: 3, st: 'Posted'}
            ],
            selected: 'void'
        },
        groups: {
            list: [],
            selected: 'void'
        }
    },
    computed: {},
    methods: {
        getPosts(filter = false) {
            if (filter) {
                this.portion = 0;
                this.posts = [];
            }
            let dataUrl = '/me/api/get-posts?portion=' + this.portion;
            if (this.filterBySt.selected !== 'void') dataUrl += '&st=' + this.filterBySt.selected;
            if (this.groups.selected !== 'void')     dataUrl += '&group=' + this.groups.selected;
            this.loading = true;
            this.$http.get(dataUrl).then((resp) => {
                this.posts = this.posts.concat(resp.data.posts);
                this.loading = false;
            });
        },
        getGroups() {
            let dataUrl = '/me/api/get-groups';
            this.$http.get(dataUrl).then((resp) => {
                this.groups.list = resp.data.groups;
            });
        },
        setSt(post, st) {
            let data = {
                id: post.id,
                st: st
            };
            this.$http.post('/me/api/set-post-st', data).then((resp) => {
                console.log(resp);
                if (!resp.data.success) return false;
                post.st = st;
            });
        },
        showOriginalImg(src) {
            this.showImgPopup = true;
            this.popupImgSrc = src;
        },
        close() {
            this.showImgPopup = false;
        },
        handleScroll() {
            let height = window.innerHeight;
            let docHeight = document.documentElement.scrollHeight;
            let windowHeight = window.scrollY;

            if (height >= (docHeight - windowHeight - 1)) {
                if (this.loading) return false;
                ++this.portion;
                this.getPosts();
            }
        },

    },
    mounted: function () {},
    created: function () {
        this.getPosts();
        this.getGroups();
    },
    beforeMount() {
        window.addEventListener('scroll', this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.handleScroll);
    }
});