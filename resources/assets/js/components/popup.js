const popup = `
	<div class="main">
		<div class="popup">
			<div style="position: fixed; left: 0; top: 0;width: 100%;height: 100%;padding: 5px 0 0;" @click="close()">
			</div>
			<div class="popup-panel">
				<div class="popup-header">
					<div class="left">
					    <slot name="header"></slot>
                    </div>
					<div class="right">
						<span style="cursor: pointer" @click="close()">X</span>
					</div>
				</div>
				<div class="popup-content">
				 	<slot name="content"></slot>
				</div>
				<div class="popup-footer">
		        	<slot name="footer"></slot>
				</div>
			</div>
		</div>
	</div>
`;

Vue.component('popup', {
    props: [],
    template: popup,
    data: function() {
        return {
            dragObject: {},
            dragging: false
        }
    },
    mounted() {},
    methods: {
        close(){
            this.$emit('close');
        }
    },
    created: function () {}
});