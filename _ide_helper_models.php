<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property-read \App\Models\User $user
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property-read \App\Models\Client $person
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Coordinator
 *
 * @property-read \App\Models\User $user
 */
	class Coordinator extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Person
 *
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $personable
 */
	class Person extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post searchPaginateAndOrder()
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profile
 *
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Test
 *
 */
	class Test extends \Eloquent {}
}

