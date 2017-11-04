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
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $type
 * @property string $document
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $street
 * @property string $neighborhood
 * @property string $number
 * @property string $complement
 * @property string $phone
 * @property string|null $phoneAlternative
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read \App\Models\Person $person
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client wherePhoneAlternative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client whereZipCode($value)
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
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $document
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $street
 * @property string $neighborhood
 * @property string $number
 * @property string $complement
 * @property string $phone
 * @property string|null $phoneAlternative
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee wherePhoneAlternative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereZipCode($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property int $client_id
 * @property string $name
 * @property string $local
 * @property string $zip_code
 * @property string $city
 * @property string $state
 * @property int $duration
 * @property int $quantityEmployees
 * @property string $observations
 * @property string $startDate
 * @property string $endDate
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereQuantityEmployees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereZipCode($value)
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Person
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $document
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $street
 * @property string $neighborhood
 * @property string $number
 * @property string $complement
 * @property string $phone
 * @property string|null $phoneAlternative
 * @property string $email
 * @property int|null $personable_id
 * @property string|null $personable_type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $personable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person wherePersonableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person wherePersonableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person wherePhoneAlternative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Person whereZipCode($value)
 */
	class Person extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post searchPaginateAndOrder()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string $address
 * @property string $cep
 * @property string $number
 * @property string|null $complement
 * @property string $city
 * @property string $neighborhood
 * @property string $state
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $email
 * @property int $role
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Test
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereUpdatedAt($value)
 */
	class Test extends \Eloquent {}
}

