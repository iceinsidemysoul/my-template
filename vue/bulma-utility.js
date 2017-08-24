// navbar burger toggle
document.addEventListener('DOMContentLoaded', function () {
    // add is-active class to current menu-item
    var path_name = document.location.pathname;
  var menu_list = document.querySelectorAll('.navbar-start>.navbar-item');
  var menu_dropdown_list = [];
  menu_list.forEach(function (each_menu) {
    each_menu.querySelectorAll('.navbar-item').forEach(function (each_menu_item) {
        menu_dropdown_list.push(each_menu_item);
    });
  });
  menu_dropdown_list.forEach(function (each) {
    if (each.getAttribute('href') == path_name){
        each.classList.add('is-active');
        each.parentElement.classList.add('is-active');
    } else {
        each.classList.remove('is-active');
    }
  });

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any nav burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

// tabs component
/*
	usage
	<tabs>
      <tab name="menu1" :selected="true"></tab>
      <tab name="menu2"></tab>
      <tab name="menu3"></tab>
  </tabs>
*/
Vue.component('tabs', {
    template: `
        <div>
            <div class="tabs is-boxed">
                <ul>
                    <li v-for="tab in tabs" :class="{ 'is-active': tab.isActive }">
                        <a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
                    </li>
                </ul>
                <slot></slot>
            </div>
        </div>
    `,

    data() {
        return { tabs: [] };
    },

    created() {
        this.tabs = this.$children;
    },

    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.href == selectedTab.href);
            });
        }
    }
});


Vue.component('tab', {
    template: `
        <div><slot></slot></div>
    `,

    props: {
        name: { required: true },
        selected: { default: false }
    },

    data() {
        return {
            isActive: false
        };
    },

    computed: {
        href() {
            return '#' + this.name.toLowerCase().replace(/ /g, '-');
        }
    },

    mounted() {
        this.isActive = this.selected;
    },
});

var app = new Vue({

    el: '#app',

});
