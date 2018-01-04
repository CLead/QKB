Vue.component('tabs', {

	template:'#tab-template',
	data() {
		return {tabs: []};
	},
	created(){
		this.tabs = this.$children;
	},
	methods: {
		selectTab(selectedTab)	{
			this.tabs.forEach( tab => {
				tab.isActive = (tab === selectedTab);
			});
		}
	}

});


Vue.component('tab', {
	template: `
		<div v-show="isActive" class="container">
			<slot></slot>
		</div>
	`,

	props: {
		name : {required:true},
		selected: {default:false}
	},

	data(){
		return {
					isActive : false
				};
	},

	mounted()
	{
		this.isActive = this.selected;
	},

	computed:
	{
		href() 
		{
			return '#' + this.name.toLowerCase().replace(/ /g, '-');
		}
	}


});

new Vue({
	el: '#PCINFO'

});