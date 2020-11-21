(function(d,t) {
    var BASE_URL = "{{ baseUrl }}";
    var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src= BASE_URL + "/packs/js/sdk.js";
    s.parentNode.insertBefore(g,s);
    g.onload=function(){
        window.chatwootSDK.run({
            websiteToken: '{{ websiteToken }}',
            baseUrl: BASE_URL
        })
    }

    window.chatwootSettings = {
        type: '{{ type }}',
        launcherTitle: '{{ launcherTitle }}',
        locale: '{{ locale }}',
        position: '{{ position }}',
        showPopoutButton: {{ showPopoutButton }}
    }

    window.addEventListener('chatwoot:ready', function () {
        {% if setUser %}
        window.$chatwoot.setUser('{{ userId }}', {
            email: '{{ userEmail }}',
            name: '{{ userName }}',
            avatar_url: '{{ userAvatarUrl }}',
        });
        {% endif %}

        $('[data-chatwoot-trigger]').on('click', function () {
            window.$chatwoot.toggle();
        });
    });
})(document,"script");