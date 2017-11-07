<?php

/* @Framework/Form/form_rest.html.php */
class __TwigTemplate_b36d09a3a07b54e86a9a553932cfa07068975151ec2d31e26a6bbe8811a429a8 extends Twig_Template
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
        $__internal_34ea6040ef87e8cd83c3e7153db02473637b451eb4b671ec2ab2a141b3d75ffd = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_34ea6040ef87e8cd83c3e7153db02473637b451eb4b671ec2ab2a141b3d75ffd->enter($__internal_34ea6040ef87e8cd83c3e7153db02473637b451eb4b671ec2ab2a141b3d75ffd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rest.html.php"));

        $__internal_39c0dc5dde77053be98bd240f7aab5697474772b9a2bcd7e479a974de10e1cca = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_39c0dc5dde77053be98bd240f7aab5697474772b9a2bcd7e479a974de10e1cca->enter($__internal_39c0dc5dde77053be98bd240f7aab5697474772b9a2bcd7e479a974de10e1cca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rest.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child): ?>
    <?php if (!\$child->isRendered()): ?>
        <?php echo \$view['form']->row(\$child) ?>
    <?php endif; ?>
<?php endforeach; ?>
";
        
        $__internal_34ea6040ef87e8cd83c3e7153db02473637b451eb4b671ec2ab2a141b3d75ffd->leave($__internal_34ea6040ef87e8cd83c3e7153db02473637b451eb4b671ec2ab2a141b3d75ffd_prof);

        
        $__internal_39c0dc5dde77053be98bd240f7aab5697474772b9a2bcd7e479a974de10e1cca->leave($__internal_39c0dc5dde77053be98bd240f7aab5697474772b9a2bcd7e479a974de10e1cca_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rest.html.php";
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
        return new Twig_Source("<?php foreach (\$form as \$child): ?>
    <?php if (!\$child->isRendered()): ?>
        <?php echo \$view['form']->row(\$child) ?>
    <?php endif; ?>
<?php endforeach; ?>
", "@Framework/Form/form_rest.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_rest.html.php");
    }
}
