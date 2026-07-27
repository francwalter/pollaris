<?php

// This file is part of Pollaris.
// Copyright 2024-2026 Marien Fressinaud
// SPDX-License-Identifier: AGPL-3.0-or-later

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

// phpcs:disable Generic.Files.LineLength
final class Version20260727000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add the max_members column to proposal';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE proposal ADD max_members INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE proposal DROP max_members');
    }
}
