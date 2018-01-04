Vue.component('tabs', {

	template:'<div><ul class="tabs"><li v-for="tab in tabs" :class="{ \'active tab col s3\' : tab.isActive}" class="tab col s3"><a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a></li></ul><div class="tabs-details"><slot></slot></div></div>',
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