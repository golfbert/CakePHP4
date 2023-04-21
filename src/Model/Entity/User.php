<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string $group
 * @property string|null $api_plan
 * @property string $email
 * @property int|null $parent_id
 * @property string|null $fullname
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip_code
 * @property string|null $phone1
 * @property string|null $phone2
 * @property int|null $rank
 * @property int|null $file
 * @property int|null $handicap
 * @property string|null $about
 * @property string|null $hash
 * @property \Cake\I18n\FrozenTime|null $date_of_birth
 * @property int|null $terms
 * @property int|null $email_updates
 * @property int $post_count
 * @property string|null $medium
 * @property string|null $company
 * @property string|null $webaddress
 * @property string|null $stripe_customer_id
 * @property int|null $active_until
 * @property int|null $api_active_until
 *
 * @property \App\Model\Entity\ParentUser $parent_user
 * @property \App\Model\Entity\Buddy[] $buddies
 * @property \App\Model\Entity\CourseComment[] $course_comments
 * @property \App\Model\Entity\CoursePhoto[] $course_photos
 * @property \App\Model\Entity\CourseRating[] $course_ratings
 * @property \App\Model\Entity\CourseRound[] $course_rounds
 * @property \App\Model\Entity\GroupMember[] $group_members
 * @property \App\Model\Entity\Group[] $groups
 * @property \App\Model\Entity\TempUserKey[] $temp_user_key
 * @property \App\Model\Entity\UserCourse[] $user_courses
 * @property \App\Model\Entity\UserPoint[] $user_points
 * @property \App\Model\Entity\UserRole[] $user_roles
 * @property \App\Model\Entity\UserScore[] $user_scores
 * @property \App\Model\Entity\UserStanding[] $user_standings
 * @property \App\Model\Entity\UserUpdate[] $user_updates
 * @property \App\Model\Entity\ChildUser[] $child_users
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'parent_id' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
