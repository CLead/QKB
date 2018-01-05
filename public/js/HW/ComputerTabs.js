Vue.component('tabs', {

	template: '\n\t\t\t<div>\n\t\t\t\t<ul class="tabs">\n\t\t\t\t\t<li v-for="tab in tabs" :class="{ \'active tab col s3\' : tab.isActive}" class="tab col s3">\n\t\t\t\t\t\t<a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t<div class="tabs-details">\n\t\t\t\t<slot></slot>\n\t\t\t</div>\n\t\t</div>\n\t\t',
	data: function data() {
		return { tabs: [] };
	},
	created: function created() {
		this.tabs = this.$children;
	},

	methods: {
		selectTab: function selectTab(selectedTab) {
			this.tabs.forEach(function (tab) {
				tab.isActive = tab === selectedTab;
			});
		}
	}

});

Vue.component('tab', {
	template: '<div v-show="isActive" class="container"><slot></slot></div>',

	props: {
		name: { required: true },
		selected: { default: false }
	},

	data: function data() {
		return {
			isActive: false
		};
	},
	mounted: function mounted() {
		this.isActive = this.selected;
	},


	computed: {
		href: function href() {
			return '#' + this.name.toLowerCase().replace(/ /g, '-');
		}
	}

});

new Vue({
	el: '#PCINFO'

});