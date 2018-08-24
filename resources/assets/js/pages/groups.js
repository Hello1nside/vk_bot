const example = new Vue({
    el: '#app',
    delimiters: ['${', '}'],
    http: {
        emulateJSON: true,
        emulateHTTP: true
    },
    data: {
        addGroupForm: {
            ownerId: '',
            url: '',
            name: '',
            tag: ''
        },
        message: {
            ownerId: 'Owner id is empty',
            url: 'Url id is empty',
            name: 'Name id is empty',
            tag: 'Tag is empty'
        },
        groups: []
    },
    computed: {},
    methods: {
        getGroups() {
            this.$http.get('/me/api/get-groups').then((resp) => {
                this.groups = resp.data.groups;
            });
        },
        addGroup() {
            for (let i in this.addGroupForm) {
                if (!this.addGroupForm[i]) {
                    alert(this.message[i]);
                    return false;
                }
            }
            this.$http.post('/me/api/add-groups', {data: this.addGroupForm}).then((resp) => {
                if (!resp.data.success) return false;
                for (let i in this.addGroupForm) {
                    this.addGroupForm[i] = ''
                }
                this.getGroups();
            });
        },
        deleteGroup(group) {
            if (!group.id || !confirm('Are you sure?')) return false;

            this.$http.post('/me/api/delete-groups', {id: group.id}).then((resp) => {
                this.getGroups();
            });
        },
        parsePosts() {
            this.$http.get('https://mudrahel.com/me/api/parsing').then((resp) => {
                alert('result : ' + resp.data.result);
            });
        }
    },
    mounted: function () {
    },
    created: function () {
        this.getGroups();
    }
});