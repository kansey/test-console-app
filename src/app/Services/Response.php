<?php

/**
 * Class Response
 */
class Response
{
    /**
     * @var GroupRepositoryInterface
     */
    protected $groupRepository;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * Response constructor.
     * @param GroupRepositoryInterface $groupRepository
     * @param ProductRepositoryInterface $productRepository
     */
    public function __invoke(
        GroupRepositoryInterface $groupRepository,
        ProductRepositoryInterface $productRepository
    ): void {
        $this->groupRepository = $groupRepository;
        $this->productRepository = $productRepository;

        $this->getResponse();
    }

    /**
     * Формирование ответа
     */
    public function getResponse(): void
    {
        $parents = $this->groupRepository->findByParentId();

        if (empty($parents)) {
            return;
        }

        echo "<ul>" . "\n";

        foreach ($parents as $parent) {
            $this->printGroup($parent);
        }

        echo "</ul>" . "\n";
    }

    /**
     * Печать групп
     * @param Group $group
     * @param int $level
     * @param int $tagHeader
     */
    protected function printGroup(Group $group, int $level = 1, int $tagHeader = 1): void
    {
        $groups = $this->groupRepository->findByParentId($group->id);

        echo $this->getTab($level)
            . "<li>\n"
            . $this->getTab($level + 1)
            . "<h$tagHeader>". $group->name
            . "</h$tagHeader>"
            ."\n";

        if (!empty($groups)) {
            $level++;
            echo $this->getTab($level) . "<ul>" . "\n";

            foreach ($groups as $grp) {
               $this->printGroup($grp, $level + 1, $tagHeader + 1);
            }

            echo $this->getTab($level). "</ul>\n";
            echo $this->getTab(  $level - 1). "</li>\n";
        } else {
            echo $this->getTab(  $level ). "</li>\n";
        }
    }

    /**
     * Получение символов табуляции
     * @param int $count
     * @return string
     */
    protected function getTab(int $count)
    {
        $tab = array_fill(0, $count, "\t");
        return implode('', $tab);
    }
}