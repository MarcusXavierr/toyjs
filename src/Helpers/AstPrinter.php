<?php

namespace Phortugol\Helpers;

use Phortugol\Expr\BinaryExpr;
use Phortugol\Expr\ConditionalExpr;
use Phortugol\Expr\Expr;
use Phortugol\Expr\ExprHandler;
use Phortugol\Expr\GroupingExpr;
use Phortugol\Expr\LiteralExpr;
use Phortugol\Expr\UnaryExpr;

class AstPrinter
{
    /** @use ExprHandler<string> */
    use ExprHandler;

    public function print(Expr $expression): string {
       return $this->evaluate($expression);
    }

    protected function handleBinary(BinaryExpr $expr): string {
        return $this->parenthesize($expr->token->lexeme, $expr->left, $expr->right);
    }

    protected function handleUnary(UnaryExpr $expr): string {
        return $this->parenthesize($expr->token->lexeme, $expr->right);
    }

    protected function handleLiteral(LiteralExpr $expr): string {
        if ($expr->value === null) return "nulo";
        return $expr->value;
    }

    protected function handleGrouping(GroupingExpr $expr): string {
        return $this->evaluate($expr->expression);
    }

    protected function handleConditional(ConditionalExpr $expr): string {
        return $this->parenthesize("if", $expr->condition, $expr->trueExpr, $expr->falseExpr);
    }

    private function parenthesize(string $name, Expr ...$exprs): string {
        $builder = "(" . $name;
        foreach ($exprs as $expr) {
            $builder .= " " . $this->evaluate($expr);
        }
        $builder .= ")";

        return $builder;
    }
}
