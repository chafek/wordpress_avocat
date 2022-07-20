<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'avocat_perbet' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '?T(X9#Ff|-]C[F&D[E!G)pY|!lsmJ6!14~^SZ2<FXci]H*Oeg[RidwNcO[@:I(b9' );
define( 'SECURE_AUTH_KEY',  'L1XJC9>cPU6*;0<H@mm,r(>@pPKO(J7[mydvVvNZl,iNpCiH]h6]m_56$<7.b8WA' );
define( 'LOGGED_IN_KEY',    '!BI0f2@i~vlSL9}_l{l`E$O7+tq+Re:OyeE}LC9pbN/18<a]}9Z>V[qrVNoq}&J8' );
define( 'NONCE_KEY',        'g| 4yAR/d`t:[gXMj5r>jyljBL fk?+V`5}:rp`&hly2r9|=NCVOutj{FX;.vAxK' );
define( 'AUTH_SALT',        'A)Im/+=M+at`yP%(k},$S$O),<5?<|1Kjz<]Vz7`DFSP]$`sk@@c`.FKp,m3<KZ&' );
define( 'SECURE_AUTH_SALT', '|ysGUG5i*yydK+Rl]5U@v[{tL+PB?=D~IvPgO0uYp|S TM6~RsqaG`!^gTc39Ovm' );
define( 'LOGGED_IN_SALT',   '^ll[^[E]jYY{lzi]!`k>Qh6-=N pm~d{e4P8L7Pj|MA;E!K+SJhDyPr>qg4n;XO%' );
define( 'NONCE_SALT',       '?;&zHErYcg,!hVqjh&=uA#aOn+bNgQyitt*us5t{ru+}l`2>Q.LgMrk5BsUxOK7a' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
