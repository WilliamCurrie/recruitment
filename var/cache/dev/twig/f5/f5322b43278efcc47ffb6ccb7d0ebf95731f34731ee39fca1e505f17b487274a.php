<?php

/* @Framework/Form/form_end.html.php */
class __TwigTemplate_d710e7ed16c18f0504d5f91d400a6c996ab5f8d92eace2554193e8bcb124937a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5157a6a68fef649b2dfec1b9d509fbcd24b86d495b48c0a3e84feee467f6a75b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5157a6a68fef649b2dfec1b9d509fbcd24b86d495b48c0a3e84feee467f6a75b->enter($__internal_5157a6a68fef649b2dfec1b9d509fbcd24b86d495b48c0a3e84feee467f6a75b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_end.html.php"));

        $__internal_58703476e41736710386f6d0006fff6b9a7880c6a82f766d5f612f6d178ce2d0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_58703476e41736710386f6d0006fff6b9a7880c6a82f766d5f612f6d178ce2d0->enter($__internal_58703476e41736710386f6d0006fff6b9a7880c6a82f766d5f612f6d178ce2d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_end.html.php"));

        // line 1
        echo "<?php if (!isset(\$render_rest) || \$render_rest): ?>
<?php echo \$view['form']->rest(\$form) ?>
<?php endif ?>
</form>
";
        
        $__internal_5157a6a68fef649b2dfec1b9d509fbcd24b86d495b48c0a3e84feee467f6a75b->leave($__internal_5157a6a68fef649b2dfec1b9d509fbcd24b86d495b48c0a3e84feee467f6a75b_prof);

        
        $__internal_58703476e41736710386f6d0006fff6b9a7880c6a82f766d5f612f6d178ce2d0->leave($__internal_58703476e41736710386f6d0006fff6b9a7880c6a82f766d5f612f6d178ce2d0_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_end.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<?php if (!isset(\$render_rest) || \$render_rest): ?>
<?php echo \$view['form']->rest(\$form) ?>
<?php endif ?>
</form>
", "@Framework/Form/form_end.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_end.html.php");
    }
}
