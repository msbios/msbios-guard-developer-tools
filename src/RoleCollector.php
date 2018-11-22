<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Guard\DeveloperTools;

use MSBios\Guard\Provider\IdentityProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Role\RoleInterface;
use ZendDeveloperTools\Collector\CollectorInterface;

/**
 * Class RoleCollector
 * @package MSBios\Guard\DeveloperTools
 */
class RoleCollector implements CollectorInterface, \Serializable
{
    /** @const NAME */
    const NAME = self::class;

    /** @const PRIORITY */
    const PRIORITY = 150;

    /** @var  IdentityProviderInterface */
    protected $identityProvider;

    /**
     * @var array|string[] collected role ids
     */
    protected $collectedRoles = [];

    /**
     * RoleCollector constructor.
     * @param IdentityProviderInterface $identityProvider
     */
    public function __construct(IdentityProviderInterface $identityProvider)
    {
        $this->identityProvider = $identityProvider;
    }

    /**
     * Collector Name.
     *
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * Collector Priority.
     *
     * @return integer
     */
    public function getPriority()
    {
        return self::PRIORITY;
    }

    /**
     * Collects data.
     *
     * @param MvcEvent $mvcEvent
     */
    public function collect(MvcEvent $mvcEvent)
    {

        /** @var array $identityRoles */
        $identityRoles = $this->identityProvider
            ->getIdentityRoles();

        /**
         * @var int $key
         * @var mixed $role
         */
        foreach ($identityRoles as $key => $role) {
            if (is_string($role)) {
                $this->collectedRoles[$key] = $role;
                continue;
            }

            if ($role instanceof RoleInterface) {
                $this->collectedRoles[$key] = $role->getRoleId();
                continue;
            }

            // Exception
        }
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: JSON?
        return serialize($this->collectedRoles);
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: JSON?
        $this->collectedRoles = unserialize($serialized);
    }

    /**
     * @return array|\string[]
     */
    public function getCollectedRoles()
    {
        return $this->collectedRoles;
    }
}
