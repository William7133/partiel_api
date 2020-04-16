# partiel_api

# Qu'est-ce qu'un DTO et à quoi sert-il ?

Un objet de transfert de données (DTO) est un objet utilisé pour transmettre des données entre différentes couches de votre application. 
Il ne contient aucune donnée métier, mais uniquement les données minimales requises à transférer entre les couches ou les applications.

# Quelle est la différence entre un listener et un subscriber dans Symfony ?

Un subscriber est une classe qui écoute un ou plusieurs évènements.
Le subscriber peut ensuite être enregistré simplement dans l'injecteur de dépendance.
Autant un subscriber doit implémenter une SubscriberInterface, autant une classe listener est une classe PHP standard qu'on enregistre comme un service dans le DIC. 

# Qu'est-ce qu'un JWT ? Pourquoi l'utilise-t-on plutôt que les sessions PHP ?

Le principe d’authentification JSON Web Tokens est de retourner un token chiffré grâce à une clé secrète (en utilisant l’algorithme HMAC) ou en utilisant des clés de chiffrements de type SHA256 ou ECDSA par exemple.
Le token comporte directement les information client tel que le username.
Les sessions peuvent être modifiables, elles sont donc moins sécurisées.

# Qu'est-ce que CORS ?

Le «  Cross-origin resource sharing » (CORS) ou « partage des ressources entre origines multiples » (en français, moins usité) est un mécanisme qui consiste à ajouter des en-têtes HTTP afin de permettre à un agent utilisateur d'accéder à des ressources d'un serveur situé sur une autre origine que le site courant. 

# Quelle est la différence entre JSON et JSON-LD ?

json ld permet d'avoir plus d'informations que le json. Il contient notamment des informations tel @id et @type.
(informations pour le developeur).
